<?php namespace	Nredbugs\Emails;

class Email {

	protected $data;

    public function Mailbox($config, $email)
    {
    	$connection = $this->ServerConnection($config);
		$mailbox = $connection->getMailbox($email['processing']);
		$this->data['count'] = $this->checkMail($mailbox);
		$messages = $mailbox->getMessages();
		$path = public_path().$email['path'];

		foreach ($messages as $message) {
			$attachments = $message->getAttachments();
			foreach ($attachments as $file) {
				$extension = pathinfo($file->getFilename(), PATHINFO_EXTENSION);
				if(in_array($extension, $email['extensions'])){
				    $xml = file_put_contents($path.$file->getFilename(),$file->getDecodedContent());
				    $this->data[$file->getFilename()]['from'] = $message->getFrom();			
				    $this->data[$file->getFilename()]['subject'] = $message->getSubject();
				    $this->data[$file->getFilename()]['bodyText'] = $message->getBodyText();			
				    $this->data[$file->getFilename()]['date'] = $message->getDate();			
				    $this->data[$file->getFilename()]['body_xml'] = file_get_contents($path.$file->getFilename());
				}
			}

			if($email['move'] != ''){
				$mailbox_trash = $connection->getMailbox($email['move']);
				$message->move($mailbox_trash);
			}
		}			
		return response()->json($this->data);
    }

    public function Validation()
    {
    	if(!env('EMAILS_EMAIL') && !env('EMAILS_PASSWORD')){
    		return "THERE ARE NO ENVIRONMENT VARIABLES";
    	}
    }

    public function CheckMail($mailbox)
    {
    	if($mailbox->count() <= 0){
    		return "EMAIL EMPTY";
    	}
    }

    public function ServerConnection($config)
    {
    	$this->validation();
    	$server = new Server( $config['hostname']);
		return $server->authenticate(env('EMAILS_EMAIL'), env('EMAILS_PASSWORD'));
    }

}