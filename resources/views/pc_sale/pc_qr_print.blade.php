<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="XL1LTaGOrRdrf1QmXiesCB25nAWG5NaXcncrTmpz">
      <title></title>
      <link rel="stylesheet" href='https://mmwebfonts.comquas.com/fonts/?font=pyidaungsu' />
      <style>
         * {
              margin: 0;
              padding: 0;
              box-sizing: border-box;
              font-family: 'Roboto', sans-serif;
            }
            body {
              width: 100vw;
              height: 100vh;
              display: flex;
              flex-direction: column;
              justify-content: center;
              align-items: center;
            }
            .wrapper {
              padding: 1rem;
            }
            table {
              margin-top: 1rem;
              width: 100%;
            }
            table, th, td {
              border: 1px solid black;
              border-collapse: collapse;
            }
            th, td {
              padding: 0.8rem;
            }
            .bg-dark {
              background-color: #000;
              color:#fff;
            }
            .left {
              text-align: left;
            }
         @page {
         size:A5;
         margin-left: 0px;
         margin-right: 0px;
         margin-top: 0px;
         margin-bottom: 0px;
         margin: 0;
         -webkit-print-color-adjust: exact;
         }
         .watermark {
            visibility: visible;
            /*position: absolute;*/
            z-index: -1;
            bottom: 0;
            /*left: 0;
            right: 0;*/
            background: url({{ asset('linnlogo.jpg') }});
            opacity: 1;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-position: center;
        }
      </style>
   </head>
      <img src="{{asset($photo_path)}}" style="width:500px;height:500px;">
      <script>
         window.print();
      </script>
   </body>
</html>