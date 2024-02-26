
    countdown();
    setInterval(countdown,1000); //Update the countdown every second
    function countdown() {
        var tyear = document.getElementById('tyear').innerHTML;
        var tmon = document.getElementById('tmon').innerHTML;
        var tday = document.getElementById('tday').innerHTML;
        var thour = document.getElementById('thour').innerHTML;
        var tmin = document.getElementById('tmin').innerHTML;
        var tsec = document.getElementById('tsec').innerHTML;
        if (thour == '24') {
            var wtime = '00'+':'+tmin+':'+tsec;    

            if (tday >= 1) {
                var stdate = tday + 1;
                var tdate = tyear+'-'+tmon+'-'+'0'+stdate;                
            }

            if (tday <=9) {
                var stdate = tday + 1;
                var tdate = tyear+'-'+tmon+'-'+'0'+stdate;
            }

            var tdate = tyear+'-'+tmon+'-'+'0'+tday;
        }else if (thour == '25') {
            var wtime = '01'+':'+tmin+':'+tsec;    

            if (tday >= 1) {
                var stdate = tday + 1;
                var tdate = tyear+'-'+tmon+'-'+'0'+stdate;                
            }

            if (tday <=9) {
                var stdate = tday + 1;
                var tdate = tyear+'-'+tmon+'-'+'0'+stdate;
            }

            var tdate = tyear+'-'+tmon+'-'+'0'+tday;
        }else{
            var wtime = thour+':'+tmin+':'+tsec;    
            var tdate = tyear+'-'+tmon+'-'+tday;
        }
        
        var targetDate = new Date(''+tdate+'T'+wtime+'').getTime();
        var nown = new Date().getTime();
        var timeRemaining = targetDate - nown;
        if (timeRemaining <= 0) {
            document.getElementById('time').innerHTML = 'Countdown Expired';
            window.location='backend_result_calculator.php';
        }else{
            var days = Math.floor(timeRemaining / (1000 * 60 *60 *24));
            var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 *60));
            var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeRemaining % (1000 * 60)) / (1000));
            var countdownText = `${hours}:  ${minutes}:  ${seconds}`;
            document.getElementById('time').innerHTML = countdownText;
        }

        
    }

        