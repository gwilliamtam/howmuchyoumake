class Coins
{
    constructor() {
        this._start_x = window.innerWidth - 170;
        this._start_y = 180;
        this._income = 0;
        this._period = 0;
        this._interval = null;
        this._coin = 'dollar';
        this._image = null;
        this._coinImageFile = '/images/dollar.png';
        this._sound = new Audio("sound.wav"); // buffers automatically when created
    }

     createCoin()
     {
         this._image = document.createElement('img');
         this._image.setAttribute('src', this._coinImageFile);
         this._image.setAttribute('class', 'coin');
         this._image.style.top = this._start_y + 'px';
         this._image.style.right = window.innerWidth - this._start_x + 'px';
         let game = document.getElementById('game');
         game.appendChild(this._image);
     }

     incomeChange()
     {
         if (this._interval) {
             clearInterval(this._interval);
         }
         this._income = $('#income').val();
         this._period = $('#period').val();
         this._coin = $('#menu-coin').val();
         let factor = 1;
         if (this._coin == 'cent') {
             factor = 100;
         }
         if (this._coin == 'quarter') {
             factor = 4;
         }
         if (this._coin == 'dollar') {
             factor = 1;
         }
         this.setCoinImage();
         let dollarsPerSecond = (factor * this._income / this._period) / 3600;
         let secondsPerDollar = 1/dollarsPerSecond;
         let message = 'You make 1 ' + this._coin  +' every ' + secondsPerDollar + ' seconds';
         document.getElementById('message').innerText = message;
         let delay = 1000 * secondsPerDollar;
         this._interval = setInterval(function(){
             coins.createCoin();
             // this._sound.play();
         }, delay);
     }

     setCoinImage()
     {
         if (this._coin == 'cent') {
             this._coinImageFile = '/images/cent.png';
         }
         if (this._coin == 'quarter') {
             this._coinImageFile = '/images/quarter1.png';
         }
         if (this._coin == 'dollar') {
             this._coinImageFile = '/images/dollar.png';
         }
         console.log(this._coinImageFile);
         $('.coin').attr('src',this._coinImageFile);
     }

}




