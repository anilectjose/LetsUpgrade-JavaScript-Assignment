subject = 'Successfull'
    message = f'Welcome to justclick Portal.\n You are under verification'
    email_from = myapp.settings.EMAIL_HOST_USER
    recipient_list = [email]
    send_mail( subject, message, email_from, recipient_list )
    return redirect('/login/')