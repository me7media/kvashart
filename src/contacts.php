<?php

    $emailTo = "my-email-for-site-messages@gmail.com"; // Куда будут отправлять сообщения с сайта
    $msg     = "";

    if (Post("is_send"))
    {
        $errs  = array();
        $email = trim(Post("email"));
        $text  = trim(Post("text"));
         
        if (!IsValidEmail($email))
        {
            $errs[] = L("err_incorrect_email_notg");
        }
        if (empty($text))
        {
            $errs[] = L("err_empty_text_notg");
        }

        if (empty($errs))
        {
            $lines = array();
            $lines[] = L("user_email_notg") . ": {$email}";
            $lines[] = L("user_text_notg")  . ": {$text}";

            $ret = SendMail($emailTo, L("email_title_notg"), implode("<br>", $lines));

            if ($ret != 1)
            {
                $errs[] = L("err_unknown_notg");
            }
        }

        if (empty($errs))
        {
            $msg = MsgOk(L("email_success_notg"));
            $_POST = array(); // Если не очистить ввод, то на форме останется e-mail и текст сообщения
        }
        else
        {
            $msg = MsgErr(implode("<br>", $errs));
        }
    }
?>