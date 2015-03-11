<?php 

class Controller_Admin_Inquiry extends Controller
{
	public function action_index()
	{
		$instances = Model_Inquiry::find('all');
		return Response::forge(View::forge('admin/inquiry/index', array(
			'instances' => $instances
		)));
	}

	public function action_delete($id)
	{
		$instance = Model_Inquiry::find($id);

		if ( ! $instance)
		{
			throw new HttpNotfoundException();
		}

		$instance->delete();

		Response::redirect(Input::referrer());
	}

	public function action_edit($id)
	{

		if ( ! ($instance = Session::get('admin.instance')))
		{
			$instance = Model_Inquiry::find($id);
		}

		Session::delete('admin.instance');

		if ( ! $instance)
		{
			throw new HttpNotfoundException();
		}

		$messages = Session::get_flash('messages', array());

		return Response::forge(View::forge('admin/inquiry/edit', array(
			'instance' => $instance,
			'messages' => $messages
		)));
	}

	public function action_confirm($id)
	{
		$instance = Model_Inquiry::find($id);

		if ( ! $instance)
		{
			throw new HttpNotfoundException();
		}

		$instance->set(Input::post());

		Session::set('admin.instance', $instance);

		$val = Model_Inquiry::validate();

		if ($val->run())
		{
			$view = View::forge('admin/inquiry/confirm', array(
				'instance' => $instance
			));
			$response = Response::forge($view);
			return $response;
		}
		else
		{
			Session::set_flash('messages', $val->error_message());
			Response::redirect('admin/inquiry/'.$id.'/edit');
		}
	}

	public function action_submit($id)
	{
		$instance = Session::get('admin.instance');

		if ( ! $instance)
		{
			Session::set_flash('messages', array('セッションが切れました'));
			Response::redirect('admin/inquiry/'.$id.'/edit');
		}

		if ($instance->save())
		{
			Session::set_flash('messages', array('保存されました'));
			Session::delete('admin.instance');
			Response::redirect('admin/inquiry/'.$id.'/edit');
		}
	}
}