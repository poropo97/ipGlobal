<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pago de {{$payment->realAmount}} €</title>
    <style media="screen">
    /* Reset css */
    html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
margin: 0;
padding: 0;
border: 0;
font-size: 100%;
font: inherit;
vertical-align: baseline;
}
/* older browsers */
article, aside, details, figcaption, figure,
footer, header, hgroup, menu, nav, section {
display: block;
}
body {
line-height: 1;
}
ol, ul {
list-style: none;
}
blockquote, q {
quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
content: '';
content: none;
}
table {
border-collapse: collapse;
}
html {
  background: #e5e5e5;
  font-family: sans-serif;
  background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtdU1c7PbLFOyi1mi1YBNxms_r6gTivWIwJw&usqp=CAU");
  background-repeat: inherit;

}
main {
  background: #ffffff;
  width: 80%;
  margin: auto;
  max-width: 500px;
  margin-top: 25vh;
  padding: 30px;
  border-radius: 60px;
}
.infoPago {
  text-align: center;
}
.profileImage {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  margin: auto;
  margin-top: -90px;
}
h1 {
  font-size: 2rem;
}
.infoPago, .infoClient,h1 {
    margin-top: 10px;
}

    </style>
  </head>
  <body>
    <main>
      <div class="infoPago">
        @if($payment->user)
          <div class="infoClient">
            <img class="profileImage" width="70" height="70" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/271deea8-e28c-41a3-aaf5-2913f5f48be6/de7834s-6515bd40-8b2c-4dc6-a843-5ac1a95a8b55.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzI3MWRlZWE4LWUyOGMtNDFhMy1hYWY1LTI5MTNmNWY0OGJlNlwvZGU3ODM0cy02NTE1YmQ0MC04YjJjLTRkYzYtYTg0My01YWMxYTk1YThiNTUuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.BopkDn1ptIwbmcKHdAOlYHyAOOACXW0Zfgbs0-6BY-E" alt="">
            <p> <b>Nombre:</b> {{$payment->user->name?? ""}} </p>
            <p> <b>Correo:</b> {{$payment->user->email?? ""}} </p>
          </div>
        @endIf
        <div class="infoPago">
          <span>Fecha de pago: {{$payment->payed_at}}</span>
          <h1>Pago de {{$payment->realAmount}}€</h1>
        </div>
      </div>
    </main>

  </body>
</html>
