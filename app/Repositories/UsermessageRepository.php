<?php

namespace App\Repositories;

use App\Models\ContactUsModel;

class UsermessageRepository{
  private $contactUsModel;

  public function __construct()
  {
      $this->contactUsModel = new ContactUsModel;
  }
  public function createMessage($request, $user)
  {
       $this->contactUsModel->create([
          'subject'=> $request->subject,
          'message'=> $request->message,
          'name'=> $user->name,
          'email'=> $user->email,
          'phone'=> $user->phone,
      ]);

  }
}
?>
