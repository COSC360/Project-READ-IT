
# Client-Side Experience

## Layout

Dashboard
![Dashboard Page](images/Dashboard%20Page.png)
The dashboard page is the main page of the site, where users can view discussion posts and navigate to all other pages.

Sign Up
![Sign Up Page](images/Sign%20Up%20Page.png)
The sign up page is used to create an account for the site, allowing users to access more features.

Login
![Login Page](images/Login%20page.png)
The login page allows users to provide their credentials to login to the site.

Discussion Post
![Discussion Post Page](images/Discussion%20Post%20Page.png)
The discussion post page includes the post's content, information about the poster, and a comment section.

User Profile
![User Profile Page](images/User%20Page.png)
The user profile page shows the posts created by the user, as well as the user's information.

Admin
![Admin Page](images/Admin%20Page.png)
The admin page view is used to delete posts and ban users, and can only be accessed by admin users.

## Site Map

![Site Map](images/Sitemap.png)

Users can access the login, sign up, discussion post, and user profile pages from the dashboard page. Additionally, the admin page can be accessed from the user profile page if the user has admin permissions.

## Logic Process

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

[User Profile](/Page%20Type%20Examples/profil.html)

[Admin](/Page%20Type%20Examples/Admin.html)
