window.onscroll = function() {myFunction()};

function myFunction() {
    if (document.body.scrollTop > 1 || document.documentElement.scrollTop > 1) {
        document.querySelector(".navbar").classList.add("scrolled");
    } else {
        document.querySelector(".navbar").classList.remove("scrolled");
    }
}

var scene1 = document.getElementById('scene1');
var parallaxInstance1 = new Parallax(scene1,{
});
var rotateTween= new TimelineMax({repeat:-1}).to(".circle",3,{rotation:360});
var hack = new CircleType(document.getElementById('hack_text')).dir(-1).radius(450);
var currentDate = new Date().getTime() / 1000;
        var futureDate = new Date("April 17, 2018 10:00:00").getTime() / 1000;

        $(document).ready(function () {
            $('nav a').click(function(){
                $('html, body').animate({
                    scrollTop: $( $.attr(this, 'href') ).offset().top-50
                }, 500);
                return true;
            });
            $('body').scrollspy({ target: '#navbar-example' });
            $('.collapse').collapse({
                toggle: false,
              });
          $('#countdown9').ClassyCountdown({

            
            end: futureDate,
            now: currentDate,
            labels: true,
            style: {
              element: "",
              textResponsive: .5,
              days: {
                gauge: {
                  thickness: .15,
                  bgColor: "rgba(0,0,0,0)",
                  fgColor: " #F99007",
                  lineCap: 'round'
                },
                textCSS: 'font-weight:300; color:#037AB4;'
              },
              hours: {
                gauge: {
                  thickness: .15,
                  bgColor: "rgba(0,0,0,0)",
                  fgColor: " #F99007",
                  lineCap: 'round'
                },
                textCSS: ' font-weight:300; color:#037AB4;'
              },
              minutes: {
                gauge: {
                  thickness: .15,
                  bgColor: "rgba(0,0,0,0)",
                  fgColor: " #F99007",
                  lineCap: 'round'
                },
                textCSS: ' font-weight:300; color:#037AB4;'
              },
              seconds: {
                gauge: {
                  thickness: .15,
                  bgColor: "rgba(0,0,0,0)",
                  fgColor: "#F99007",
                  lineCap: 'round'
                },
                textCSS: ' font-weight:300; color:#037AB4;'
              }

            },
            onEndCallback: function () {
              console.log("Time out!");
            }
          });

          
               
            
         

        });