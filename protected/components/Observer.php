<?php
/**
 * @author Bryan Jayson Tan <admin@bryantan.info>
 * @link http://bryantan.info
 * @date 7/25/13
 * @time 5:39 PM
 */
class Observer
{
    public function registration($event)
    {
        $user = $event->sender;
        $success = $this->sendConfirmEmail($user);

        return true;
    }

    protected function sendConfirmEmail(User $user){
        $link = Yii::app()->createAbsoluteUrl("/account/confirm",array("token" => $user->auth_token));

        $message = new YiiMailMessage;
        $message->view = 'confirm_email';
        $message->setBody(array('link'=>$link), 'text/html');

        $message->subject = 'Welcome';
        $message->addTo($user->email);
        $message->from = array(Yii::app()->params['adminEmail'] => Yii::app()->params['adminEmailName']);
        return Yii::app()->mail->send($message);
    }

	
}
