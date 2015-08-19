<?php

namespace ConnectHolland\PiccoloContentBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
	public function contactAction(Request $request)
	{
		$pageURL = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		$url = substr($pageURL, 0, strpos($pageURL, "/"));

		/**
		 * $receiver value is set in PiccoloClientBundle\Resources\config\parameters.yml
		 */
		$receiver = $this->container->getParameter('email_receiver');
		$name = $request->request->get('name');
		$email = $request->request->get('email');
		$subject = $request->request->get('subject');
		if ($subject == null) {
			$subject = 'Message from ' . $url;
		}
		$body = $request->request->get('body');

		/**
		 * If custom defined, use PiccoloClientBundle template
		 * Else use default, use PiccoloContentBundle template
		 */
		if (file_exists('ConnectHollandPiccoloClientBundle:Form:emailTemplate.txt.twig'))
			$emailTemplate = 'ConnectHollandPiccoloClientBundle:Form:emailTemplate.txt.twig';
		else
			$emailTemplate = 'ConnectHollandPiccoloContentBundle:Form:emailTemplate.txt.twig';

		if ($request->request->get('submit')) {
			$message = \Swift_Message::newInstance()

				->setSubject($subject)
				->setFrom($email)
				->setTo($receiver)
				->setBody(
						$this->renderView(
							$emailTemplate,
							array(	'name' => $name,
									'body' => $body
								)
							));

			$this->get('mailer')->send($message);

			$request->getSession()->getFlashBag()->add(
	            'notice',
	            'Uw bericht is succesvol ontvangen'
	        );

			return $this->redirect($this->generateUrl('contact'));
		}

		if (file_exists('ConnectHollandPiccoloClientBundle:Block:block_contactform.html.twig')) {
			return $this->render('ConnectHollandPiccoloClientBundle:Block:block_contactform.html.twig');
		} else {
			return $this->render('ConnectHollandPiccoloContentBundle:Block:block_contactform.html.twig');
		}
	}
}
