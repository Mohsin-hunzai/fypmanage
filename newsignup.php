<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signstyle.css" type="text/css">
    <title>Document</title>
</head>
<body>
    
<form>
        <div className="form-inner">
          <h2>sign in your account</h2>

          <div className="form-group">
            <label htmlFor="email">Email Address</label>
            <input type="email" name="email" id="email" placeholder="email address" onChange={onChangeHandler} />
          </div>
          <div className="form-group">
            <label htmlFor="password">Your Password</label>
            <input type="password" name="password" id="password" placeholder="Password" onChange={onChangeHandler} />
          </div>
          <input type="submit" value="Log In" className="signin-btn" onSubmit={submitHandler}/>
         <div>
           <hr></hr>
         <button className="signup-btn">Create Account</button>
         </div>
        </div>
        
      </form>

</body>
</html>