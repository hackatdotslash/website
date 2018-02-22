window.onscroll = function() {myFunction()};

function myFunction() {
    if (document.body.scrollTop > 1 || document.documentElement.scrollTop > 1) {
        document.querySelector(".navbar").classList.add("scrolled");
    } else {
        document.querySelector(".navbar").classList.remove("scrolled");
    }
}
var currentDate = new Date().getTime() / 1000;
        var futureDate = new Date("April 17, 2018 10:00:00").getTime() / 1000;

        $(document).ready(function () {
          $('#countdown9').ClassyCountdown({


            end: futureDate,
            now: currentDate,
            labels: true,
            style: {
              element: "",
              textResponsive: .5,
              days: {
                gauge: {
                  thickness: .10,
                  bgColor: "rgba(0,0,0,0)",
                  fgColor: " #a8c0ff",
                  lineCap: 'round'
                },
                textCSS: 'font-weight:300; color:#3f2b96;'
              },
              hours: {
                gauge: {
                  thickness: .10,
                  bgColor: "rgba(0,0,0,0)",
                  fgColor: " #a8c0ff",
                  lineCap: 'round'
                },
                textCSS: ' font-weight:300; color:#3f2b96;'
              },
              minutes: {
                gauge: {
                  thickness: .10,
                  bgColor: "rgba(0,0,0,0)",
                  fgColor: " #a8c0ff",
                  lineCap: 'round'
                },
                textCSS: ' font-weight:300; color:#3f2b96;'
              },
              seconds: {
                gauge: {
                  thickness: .10,
                  bgColor: "rgba(0,0,0,0)",
                  fgColor: " #a8c0ff",
                  lineCap: 'round'
                },
                textCSS: ' font-weight:300; color:#3f2b96;'
              }

            },
            onEndCallback: function () {
              console.log("Time out!");
            }
          });

          
               
            
         

        });