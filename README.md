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

### React/vanilla-frontend
**`Note: React just optional beacuse of the time`**
### SQL-db
<table>
    <tr>
        <th>users</th>
        <th>user_pasta</th>
        <th>guest_pasta</th>
        <th>comments</th>
        <th>suggestions</th>
    </tr>
    <tr>
        <td>user_id</td>
        <td>u_pasta_id</td>
        <td>g_pasta_id</td>
        <td>comment_id</td>
        <td>suggest_id</td>
    </tr>
    <tr>
        <td>username</td>
        <td>u_pasta_name</td>
        <td>g_pasta_name</td>
        <td>user_id(foregin key)</td>
        <td>suggest_id</td>
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