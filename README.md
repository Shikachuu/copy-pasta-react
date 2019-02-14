
- [Plans about the site](#PLANS)
- [Currently I am working on...](#IN-PROGRESSS)
- [What is finished?](#DONE)

## PLANS
### PHP-backend
<h5>Main Page</h5>
<p>List the posts from guest_pasta and public posts from user_pasta, list comments</p>
<h5>Add Pasta</h5>
<p>Give the values from the fields to the controller, the controller is includes them to the db.</p>
<h5>Register-Login</h5>
<p>It's only one page, register is create a new user.</p>
<p>Login log you in into an existing user and put the values to a cookie/session. [just the username]</p>
<p>The password input is already hashed via JS.</p>
<h5>Admin</h5>
<p>Only admin users can see this option. This kind of users can see all the posts and can delete without pw.</p>
<h5>Report bug/suggest correction</h5>
<p>Button on every OPENED pasta. Preload the code for the editor. Log wihich rows have been edited.</p>

`Tools: Vanilla PHP`

### React/vanilla-frontend
**`Note: React just optional beacuse of the time`**
<h4>MAIN CONCEPT</h4>
<ul>
    <li>Dark theme: dark/gray/black bg-s popups etc.</li>
    <li>Use as much nes.css as I can, but keep it readable.</li>
    <li>Make it as userfriendly as I can.</li>
    <li>Navbar(dark w/logo) => Right: Search, Left: Home, Add, Register-Login, (hidden)Admin</li>
    <li><a href="https://github.com/thedaviddias/Front-End-Checklist">Follow this list</a></li>
</ul>
<h5>Main Page</h5>
<p>Card layout, right corner suggestion button, left corner name(clickable)-createdDate-whoCreated-edited, down hidden comments, row/button to open it down</p>
<p>Floating Add new button at the Bottom-Left corner</p>
<h5>Add Pasta</h5>
<h5>Register-Login</h5>
<h5>Admin</h5>
<h5>Report bug/suggest correction</h5>

`Tools: Highlight.js, Bootstrap.css, Material Icons, Nes.Css, Sweetalert2, React.js(based on time)`
### SQL-db
<table>
    <tr>
        <th>users</th>
        <th>comments</th>
        <th>suggestions</th>
    </tr>
    <tr>
        <td>user_id</td>
        <td>comment_id</td>
        <td>suggest_id</td>
    </tr>
    <tr>
        <td>username</td>
        <td>user_id(foregin key)</td>
        <td>pasta_id</td>
    </tr>
    <tr>
        <td>password</td>
        <td>comment_content</td>
        <td>suggest_content</td>
    </tr>
</table>

## IN-PROGRESS
### backend
### frontend
### db

## DONE
### backend
### frontend
### db