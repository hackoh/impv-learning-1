<?php 

class Controller_Inquiry extends Controller
{
	public function action_input()
	{
		if ( ! ($instance = Session::get('instance')))
		{
			$instance = Model_Inquiry::forge();
		}

		Session::delete('instance');

		$messages = Session::get_flash('messages', array());

		$view = View::forge('inquiry/input', array(
			'instance' => $instance,
			'messages' => $messages
		));
		$response = Response::forge($view);
		return $response;
	}

	public function action_confirm()
	{
		$instance = Model_Inquiry::forge(Input::post());
		Session::set('instance', $instance);

		$val = Model_Inquiry::validate();

		if ($val->run())
		{
			$view = View::forge('inquiry/confirm', array(
				'instance' => $instance
			));
			$response = Response::forge($view);
			return $response;
		}
		else
		{
			Session::set_flash('messages', $val->error_message());
			Response::redirect('inquiry/input');
		}		
	}

	public function action_submit()
	{
		$instance = Session::get('instance');

		if ( ! $instance)
		{
			Session::set_flash('messages', array('セッションが切れました'));
		}

		if ($instance->save())
		{
			Session::set_flash('messages', array('保存されました'));
			Session::delete('instance');
			Response::redirect('inquiry/input');
		}
	}
}