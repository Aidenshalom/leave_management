<div>
    &copy; Copyright <span id="year"></span> New Horizons. All Right Reserved.
</div>
<div align="right">
    Designed by Aiden.&radic; 
</div> 
<script src="./js/jquery-3.7.0.min.js"></script>
<script>
        // copyright year
        var date = new Date().getFullYear();
        
        document.getElementById("year").innerHTML = date;
</script>
<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
<script src="js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="./js/custom.js"></script>
<script>
    const options = {
  bottom: '64px', // default: '32px'
  right: '32px', // default: '32px'
  left: 'unset', // default: 'unset'
  time: '0.5s', // default: '0.3s'
  mixColor: '#fff', // default: '#fff'
  backgroundColor: '#fff',  // default: '#fff'
  buttonColorDark: '#100f2c',  // default: '#100f2c'
  buttonColorLight: '#fff', // default: '#fff'
  saveInCookies: true, // default: true,
  label: '🌓', // default: ''
  autoMatchOsTheme: true, // default: true
}

const darkmode = new Darkmode(options);
darkmode.showWidget();
</script>
