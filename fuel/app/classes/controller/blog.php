<?php

class Controller_Blog extends Controller_Base
{
	public function action_index()
	{
		$view = View::forge('blog/index');
		
		$view->posts = Model_Post::find('all');
		
		$this->template->title = 'My Blog about Stuff';
		$this->template->content = $view;
	}
	
	public function action_view($slug)
	{
		$post = Model_Post::find_by_slug($slug, array('related' => array('user', 'comments')));
		
		$this->template->title = $post->title;
		$this->template->content = View::forge('blog/view', array(
			'post' => $post,
		));
	}
	
	public function action_comment($slug)
	{
		$post = Model_Post::find_by_slug($slug);
		
		Debug::dump(Input::post());
		
		// Lazy validation
		if (Input::post('name') && Input::post('email') && Input::post('message'))
		{
			// Create a new comment
			$post->comments[] = new Model_Comment(array(
				'name' => Input::post('name'),
				'website' => Input::post('website'),
				'email' => Input::post('email'),
				'message' => Input::post('message'),
				'user_id' => $this->current_user->id,
			));
			
			// Save the post and the comment will save too
			$post->save();
			
			Response::redirect('blog/view/'.$slug);
		}
		
		// Did not have all the fields
		else
		{
			// Just show the view again until they get it right
			$this->action_view($slug);
		}
	}
}
