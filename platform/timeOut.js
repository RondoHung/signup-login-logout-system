$(function()
{

    function timeChecker(){
        setInterval(function(){
            let storedTimeStamp = sessionStorage.getItem("lastTimeStamp");
            timeCompare(storedTimeStamp);
        },3000);
    }

    function timeCompare(timeString){
        const currentTime = new Date();
        const pastTime = new Date(timeString);
        let timeDiff = currentTime - pastTime;
        let minPast = Math.floor(timeDiff/60000);

        if( minPast > 30){ //Greater then 1 min
            sessionStorage.removeItem("lastTimeStamp");
            window.location = "../includes/logout.inc.php";
            return false;
        }
        //for checking system only
        else{
            console.log(currentTime+" - "+pastTime+" - "+minPast+" min past");
        }
    }

    $(document).mousemove(function()
    {
        let timeStamp = new Date();
        sessionStorage.setItem("lastTimeStamp", timeStamp);
    });

    timeChecker();

});