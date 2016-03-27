<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Framework</title>

       
 <link rel="stylesheet" type="text/css" href="css/global.css">
 <link rel="stylesheet" type="text/css" href="../css/global.css">
   <link rel="stylesheet" type="text/css" href="../../css/global.css">
    </head>
     <body>
    <form action="#" method="post" name="sign up for beta form">
      <div class="header">
         <p>Welcome to the {{ page }}/index view</p>
      </div>
      <div class="description">
        <p><code>/{{ page }}/index/[name]/[mood]</code></p>
      </div>
      <div class="input">
        
        <input type="submit" class="button" id="submit" value="{{ name }} is {{ mood }}">
      </div>
    </form>
  
</html>
