<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
div {
  position: relative;
  width: 20px;
  height: 20px;
  background-color: black;
  border-radius: 50%;
}

div:before, div:after {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0px;
  background-color: inherit;
  border-radius: inherit;
  }

div:before {
  top: 40px;
  }


div:after {
  top: 80px;
}
</style>
</head>
<body>

<p>A menu icon:</p>

<div></div>


</body>
</html>
