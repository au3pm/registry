<!DOCTYPE html>
<html>

<head>
    <title>AutoIt3 Package Registry</title>
    <script src="https://unpkg.com/htmx.org@1.9.5"></script>
</head>

<body>
<h3>
  Search Contacts
  <span class="htmx-indicator">
    <img src="/img/bars.svg"/> Searching...
   </span> 
</h3>
<input class="form-control" type="search"
       name="search" placeholder="Begin Typing To Search Users..."
       hx-get="./packages/"
       hx-trigger="keyup changed delay:500ms, search"
       hx-target="#search-results"
       hx-indicator=".htmx-indicator">
    <table hx-indicator=".htmx-indicator">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>ID</th>
            </tr>
        </thead>
        <tbody id="search-results">
            <tr hx-get="./packages/?page=1" hx-trigger="revealed" hx-swap="afterend">
                <td>name</td>
                <td>email</td>
                <td>id</td>
            </tr>
        </tbody>
    </table>
    <center>
        <img class="htmx-indicator" width="60" src="/img/bars.svg">
    </center>
</body>

</html>