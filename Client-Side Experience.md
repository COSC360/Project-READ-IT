
# Client-Side Experience

## Design

READ-IT is a Reddit clone, and we wanted it to be similar to the original design, because we think it is easy for users to understand what is happening. We have the header at the top which displays the title of the account. We also have the user profile in the top left hand corner so the user can access their profile. We have all seen that layout on many other websites, like Facebook and even GitHub. The body of our page includes a two div layout. On the right side is a taskbar, where users will be able to see their profile or create a post. The middle/left is where all the information of the page will be. Reddit also does a similar layout, and we wanted to make it easy to understand just like how they did. The color comes from Color Hunt, and we thought it was a friendly layout.

## Logical process

As stated before we wanted a layout similar to something users have seen before, so it would be easy to undertsand. We want the users of the website to be able to easily view comments and read posts from random users.

The logical processes incude:

1. Login: Users will sign into their accounts to be able to post and add comments to posts.
2. Sign Up: If a user isn't signed up they will easily be able to do that.
3. Go to profile page: To go to the profile page, the user will click at the top right side of the nav bar where their profile image is.
4. View their own posts/threads: A user in their profile page will be able to customize their profile picture, add a comment about themselves, and view old posts of theirs.
5. View others posts/threads: To view other people's posts, they would go to the home page to see all of the posts. They then will be able to interact with the posts that catch their interest.
6. Ban Users (ADMIN): If someone is an admin, they will be able to ban users from the READ-IT website by entering the user's profile name and the reason they got banned. Admins have special authority on the website.

## Layout

Dashboard
![Dashboard Page](images/Dashboard%20Page.png)
The dashboard page is the main page of the site, where users can view discussion posts and navigate to all other pages. We wanted to make it easy for users to view and comment on other posts. On the right side in case users wanted to go back on their old post visited we added it to the user's board, as well as an easy way for users to upload their own threads.

Sign Up
![Sign Up Page](images/Sign%20Up%20Page.png)
The sign up page is used to create an account for the site, allowing users to access more features. It is a simple and easy to understand design. We aren't sure yet if we want to make the user to upload an email, or if it will just be a username. With a username we dont need to make sure that it is an email. However emails have more of a validation for users. We are leaning towards using an email for users to login. To do that users would then have to make up their own username for their profile and we will have to include that for the signup page, as it is missing at the moment.

Login
![Login Page](images/Login%20page.png)
The login page allows users to provide their credentials to login to the site. The login page is just like the sign up page. It is easy to use and understand, as we have all seen similar pages when we login to our favourite websites. There is also a link for users to sign up. If we cannot find the user's login name we would suggest to the user if they have an account.  

Discussion Post
![Discussion Post Page](images/Discussion%20Post%20Page.png)
The discussion post page includes the post's content, information about the poster, and a comment section. Our look for this post is to be similar to Reddit's. You see the post and it is easy to read/view. You will also get the ability to comment on comments or even comment on the post. Reddit has a great design for this and we didn't want to re-invent the wheel. We also will support uploads of images.

User Profile
![User Profile Page](images/User%20Page.png)
The user profile page shows the posts created by the user, as well as the user's information. The user profile will easily be able to view all of their posts that they have. This is on the left hand of the screen. We added a recent, older, and search option for the user to view all of their own posts. This gives the user flexibility when dealing with their posts. We also want to give the user a chance to delete their own post. On the right hand side we give the user a chance to update their profile. They can add a comment about themselves, add a profile picture, and easily post a thread as well. A profile page deserves to be customizable, and that's what we added to the user profile page.

Admin
![Admin Page](images/Admin%20Page.png)
The admin page view is used to delete posts and ban users, and can only be accessed by admin users. We also wanted to add stats each admin would have on their own, which would be the ability to see how many people they have banned. Besides that, the admin page is easy to understand and use. We did not want to overcomplicate it. Each admin page will be accessible through their own user profile page.

## Site Map

![Site Map](images/Sitemap.png)

Users can access the login, sign up, discussion post, and user profile pages from the dashboard page. Additionally, the admin page can be accessed from the user profile page if the user has admin permissions.

## Client-Side Validation

- Login credentials must not have invalid characters
- Login credentials must not exceed max length
- Login password must be password field type
- Login only submits when both username and password fields are entered
- Website field must contain https
- Posting a Discussion Post only submits when title and content fields are entered
- Discussion post file upload must be of valid type (image and video)
- Discussion post file upload must be within a specific size
- Posting a comment only submits when comment field is entered
- Profile description, thread titles, thread content, and comments must not exceed max length
- User profile picture upload must be of valid image type
- User profile image upload must be within a specific size
- Admin user ban must match existing username
- Admin user ban reason field must be entered
- Admin user ban must validate if user is already banned

## Example Pages

[Dashboard](/Page%20Type%20Examples/index.html)

[Sign Up](/Page%20Type%20Examples/signUp.html)

[Login](/Page%20Type%20Examples/Login.html)

[Discussion Post](/Page%20Type%20Examples/post.html)

[User Profile](/Page%20Type%20Examples/profile.html)

[Admin](/Page%20Type%20Examples/Admin.html)
