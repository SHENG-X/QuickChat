// request permission on page load
document.addEventListener('DOMContentLoaded', function () {
  if (!Notification) {
    alert('Desktop notifications not available in your browser. Try Chromium.'); 
    return;
  }

  if (Notification.permission !== "granted")
    Notification.requestPermission();
});

function notifyMe() {
  if (Notification.permission !== "granted")
    Notification.requestPermission();
  else {
    var notification = new Notification('QuickChat', {
      icon: 'http://www.brandcrowd.com/gallery/brands/pictures/picture14077370183196.png',
      body: "New Message",
    });

    notification.onclick = function () {
      window.open("http://cs.tru.ca/~sxiaof7/QuickChat");      
    };

  }

}
