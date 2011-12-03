<?php
class Controller_Admin_Posts extends Controller_Admin 
{

	public function action_index()
	{
		$data['posts'] = Model_Post::find('all');
		$this->template->title = "Posts";
		$this->template->content = View::forge('admin/posts/index', $data);

	}

	public function action_view($id = null)
	{
		$data['post'] = Model_Post::find($id);

		$this->template->title = "Post";
		$this->template->content = View::forge('admin/posts/view', $data);

	}

	public function action_create($id = null)
	{
		$view = View::forge('admin/posts/create');

		if (Input::method() == 'POST')
		{
			$post = Model_Post::forge(array(
				'title' => Input::post('title'),
				'slug' => Inflector::friendly_title(Input::post('title'), '-', true),
				'summary' => Input::post('summary'),
				'body' => Input::post('body'),
				'user_id' => Input::post('user_id'),
			));

			if ($post and $post->save())
			{
				Session::set_flash('success', 'Added post #'.$post->id.'.');
				Response::redirect('admin/posts');
			}

			else
			{
				Session::set_flash('error', 'Could not save post.');
			}
		}

		// Set some data
		$view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));

		$this->template->title = "Create Post";
		$this->template->content = $view;
	}

	public function action_edit($id = null)
	{
		$view = View::forge('admin/posts/edit');
		
		$post = Model_Post::find($id);

		if (Input::method() == 'POST')
		{
			$post->title = Input::post('title');
			$post->slug = Inflector::friendly_title(Input::post('title'), '-', true);
			$post->summary = Input::post('summary');
			$post->body = Input::post('body');
			$post->user_id = Input::post('user_id');

			if ($post->save())
			{
				Session::set_flash('success', 'Updated post #' . $id);

				Response::redirect('admin/posts');
			}

			else
			{
				Session::set_flash('error', 'Could not update post #' . $id);
			}
		}

		else
		{
			$this->template->set_global('post', $post, false);
		}
		
		// Set some data
		$view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));

		$this->template->title = "Edit Post";
		$this->template->content = $view;

	}

	public function action_delete($id = null)
	{
		if ($post = Model_Post::find($id))
		{
			$post->delete();

			Session::set_flash('success', 'Deleted post #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete post #'.$id);
		}

		Response::redirect('admin/posts');

	}


}