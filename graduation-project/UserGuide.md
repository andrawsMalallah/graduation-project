## Setup a newsletter



- Navigate to https://mailchimp.com/
- Sign up with your email.
- Confirm your account by navigating to your mail box and clicking ' Active my account '
- Log in to https://mailchimp.com/ with your account 
- Navigate to ' Create ' 

![image](https://user-images.githubusercontent.com/59566963/160271692-293e7b67-51e3-4289-a9eb-9e612156a545.png)

- Navigate to 'Signup Form' then 'Embedded form'

![image](https://user-images.githubusercontent.com/59566963/160271769-a567cec7-79e4-4293-a0b5-b32f7a0482f9.png)

- Press ' Continue ' 
- 
![image](https://user-images.githubusercontent.com/59566963/160271784-aa96ea6f-b51d-403d-82a5-f459a175b9e5.png)

- Copy service endpoint from form tag attribute

![image](https://user-images.githubusercontent.com/59566963/160271819-aaafa867-519a-4699-b588-752ccc52807d.png)

- In your .env file, set MAILCHIMP_ENDPOINT variable value as the copied value.

- Again, copy name attribute value from the service embedded code 


![image](https://user-images.githubusercontent.com/59566963/160271867-5aa41466-e4e8-47fc-bcd9-632e891e2ee3.png)


- Set it as MAILCHIMP_BOT_HASH value in your .env file.

- Newsletter are ready to use. Contact are saved in your Mailchimp account and can be viewed by visiting ' All contacts ' in the service dashboard.

