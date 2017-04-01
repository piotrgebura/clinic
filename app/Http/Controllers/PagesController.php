<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use GuzzleHttp\Client;

class PagesController extends Controller
{
    public function getIndex()
    {
		return view('pages.home');
	}
    
	public function getAbout()
	{
		return view('pages.about');
	}
	
	public function getContact()
	{
		return view('pages.contact');
	}
    
    public function postContact(Request $request) {
		
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10',
			'g-recaptcha-response' => 'required'
		]);
		
		$token = $request->input('g-recaptcha-response');

		if ($token) {
			$client = new Client();
			$response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
					'form_params' => array(
						'secret' => '6LcwLxsUAAAAAGqmqRqfXIlaauY7EFFMk_IJmSmD',
						'response' => $token
						)
				]);

			$result = json_decode($response->getBody()->getContents());
			if ($result->success) {
				$data = array(
					'email' => $request->email,
					'subject' => $request->subject,
					'body_message' => $request->message
				);
			
				Mail::send('emails.contact', $data, function($message) use ($data){
					$message->from($data['email']);
					$message->to('piotr.gebura@gmail.com');
					$message->subject($data['subject']);
				});
			
				Session::flash('success', 'Twój email został wysłany!');

				return redirect('/');
			} else {
				return redirect('contact');
			}	
		} else {
			return redirect('contact');
		}
	}
}
