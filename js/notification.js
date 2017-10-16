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
      icon: 'https://cdn.iconscout.com/public/images/icon/premium/png-256/message-text-love-heart-chatting-communication-3cdc5d9047f76ead-256x256.png',
      body: "New Message",
    });

    notification.onclick = function () {
      window.open("http://cs.tru.ca/~sxiaof7/QuickChat");      
    };

  }

}
