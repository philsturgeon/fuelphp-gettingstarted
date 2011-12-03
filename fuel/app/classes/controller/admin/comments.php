<?php
class Controller_Admin_Comments extends Controller_Admin 
{

	public function action_index()
	{
		$data['comments'] = Model_Comment::find('all');
		$this->template->title = "Comments";
		$this->template->content = View::forge('admin/comments/index', $data);

	}

	public function action_view($id = null)
	{
		$data['comment'] = Model_Comment::find($id);

		$this->template->title = "Comment";
		$this->template->content = View::forge('admin/comments/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$comment = Model_Comment::forge(array(
				'name' => Input::post('name'),
				'email' => Input::post('email'),
				'website' => Input::post('website'),
				'message' => Input::post('message'),
				'post_id' => Input::post('post_id'),
			));

			if ($comment and $comment->save())
			{
				Session::set_flash('success', 'Added comment #'.$comment->id.'.');

				Response::redirect('admin/comments');
			}

			else
			{
				Session::set_flash('error', 'Could not save comment.');
			}
		}

		$this->template->title = "Comments";
		$this->template->content = View::forge('admin/comments/create');

	}

	public function action_edit($id = null)
	{
		$comment = Model_Comment::find($id);

		if (Input::method() == 'POST')
		{
			$comment->name = Input::post('name');
			$comment->email = Input::post('email');
			$comment->website = Input::post('website');
			$comment->message = Input::post('message');
			$comment->post_id = Input::post('post_id');

			if ($comment->save())
			{
				Session::set_flash('success', 'Updated comment #' . $id);

				Response::redirect('admin/comments');
			}

			else
			{
				Session::set_flash('error', 'Could not update comment #' . $id);
			}
		}

		else
		{
			$this->template->set_global('comment', $comment, false);
		}

		$this->template->title = "Comments";
		$this->template->content = View::forge('admin/comments/edit');

	}

	public function action_delete($id = null)
	{
		if ($comment = Model_Comment::find($id))
		{
			$comment->delete();

			Session::set_flash('success', 'Deleted comment #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete comment #'.$id);
		}

		Response::redirect('admin/comments');

	}


}