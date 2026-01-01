<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
 <style>
      *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins',sans-serif;
   
    }

    section{
        display:flex;
        justify-content:center;
        align-items:center;
        height:100vh;
        width:100%;
        background:url('https://images.unsplash.com/photo-1432821596592-e2c18b78144f?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bG9naW4lMjBwYWdlJTIwYmFja2dyb3VuZHxlbnwwfHwwfHx8MA%3D%3D') no-repeat;
        background-size:cover;
        background-position:center;
    }

    .login-box{
    position: relative;
    width: 400px;
    height: 450px;
    background: transparent;
    border-radius: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    backdrop-filter:blur(15px);
    }

    h2{
    color: #fff;
    font-size:2em;
    text-align:center;
    }

    .input-box{
        position:relative;
        width: 310px;
        margin:30px 0;
        border-bottom:2px solid #fff;
    }

    .input-box label{
        position:absolute;
        top:50%;
        left:5px;
        transform:translateY(-50%);
        color:#fff;
        pointer-events:none;
    }

    .input-box input:focus ~ label,
    .input-box input:valid ~ label{
        top:-5px;
        
    }

    .input-box input{
        width:100%;
        height:50px;
        background:transparent;
        border:none;
        outline:none;
        font-size:1em;
        color:#fff;
        padding:0 35px 0 5px;
    }

    .input-box .icon{
        position:absolute;
        right:8px;
        color:#fff;
        font-size:1.2em;
        line-height:57px;
    }
      button{
        width:100%;
        height:40px;
        background:#fff;
        border:none;
        outline:none;
        border-radius:40px;
        cursor:pointer;
        font-size:1em;
        color:#000;
        font-weight:500;
    }
 </style>
</head>
<body>

<section>
    <div class="login-box">
        <form method="POST" action="/login">
            @csrf

            <h2>Login</h2>

            @if($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif

            <div class="input-box">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>

            <div class="input-box">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
</section>

</body>
</html>

