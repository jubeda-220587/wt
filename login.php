

<style>
body{
    font-family:Arial,Helvetica,sans-serif;
    display:flex;
    align-items:center;
    justify-content:center;
}
.login-box{
    background-color:whitesmoke;
    padding:50px;
    width:300px;
    border-radius:8px;
}
h2{
    text-align:center;
    color:#0a1f44;
}
label{
    text-align:left;
    font-weight:bold;
}
input{
    width:100%;
    padding:8px;
    border:1px;
    border-radius:5px;
    margin-bottom:15px;
}
button{
    width:100%;
    padding:10px;
    background-color:blue;
    color:white;
    font-size:15px;
    border-radius:5px;
    margin-bottom:15px;
}
button:hover{
    background-color:#142e6f;
}

.signup{
    text-align:center;
    margin-top:10px;
}
.signup a{
    font-weight:bold;
    color:#0a1f44;
}
</style>

<body>
<div class = "login-box">
    <form>
    <h2>LOGIN:</h2>
    <label>Applicant-name:</label>
    <input type="text" placeholder="Name">
    <label>E-mail:</label>
    <input type="email" placeholder="email">
    <label>Password:</label>
    <input type="password" placeholder="password">
    <label>Contact_number:</label>
    <input type="int" placeholder="number">
    <label>Address:</label>
    <input type="text" placeholder="text">
    <button type ="submit">Login</button>
    <p class = "signup">Don't have an account?<a href="#">Sign up</a></p>
    </form>
</div>
</body>