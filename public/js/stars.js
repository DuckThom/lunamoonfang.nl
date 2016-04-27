var Star = function(color, width, height) {
    this.x =  Math.round( Math.random() * width);
    this.y =  Math.round( Math.random() * height);
    this.rad = Math.round( Math.random()) + 1;
    this.rgba = color;
    this.vy = Math.random() * -0.03;
};

var Stars = function(max, debug) {
    this.lastUpdate = 0;
    this.debug = typeof debug == 'boolean' ? debug : false;
    this.running = false;
    this.color = "#ffffff";

    this.width = $(document).width();
    this.height = $('header').height();

    var canvas = document.getElementById('stars-canvas');
    canvas.width = this.width;
    canvas.height = this.height;

    this.canvas = canvas;
    this.ctx = canvas.getContext('2d');
    this.ctx.font = '18px bold \'courier new\'';
    this.ctx.globalCompositeOperation = 'lighter';
    this.ctx.fillStyle = this.color;

    this.stars = [];
    this.maxStars = max;

    for(var i = 0; i < this.maxStars; i++){
        this.stars.push(new Star(this.color, this.width, this.height));
    }
};

Stars.prototype.run = function() {
    if(!this.running) {
        this.running = true;
        this.lastUpdate = Date.now();

        var self = this;

        this.interval = setInterval(function() {
            self.loop.call(self);
        }, 16.6667);
    }
};

Stars.prototype.loop = function() {
    var now = Date.now();
    var dt = now - this.lastUpdate;
    this.lastUpdate = now;

    this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

    this.update(dt);
    this.render(dt);
};

Stars.prototype.update = function(dt) {
    for(var i = 0;i < this.maxStars; i++){
        var star = this.stars[i];

        // Move the star on the Y axis
        star.y += (dt * star.vy);

        // Allow some movement off-screen to prevent the stars from suddenly disappearing
        if(star.y > this.canvas.height) star.y = -5;
        if(star.y < -5) star.y = this.canvas.height;

        this.stars[i] = star;
    }
};

Stars.prototype.render = function(dt) {
    for(var i = 0;i < this.maxStars; i++){
        var star = this.stars[i];

        /**
         * Create a new star
         */
        this.ctx.beginPath();
        this.ctx.arc(star.x, star.y, star.rad*1.5, 0, Math.PI*2, true);
        this.ctx.fill();
        this.ctx.closePath();
    }

    if (this.debug) {
        this.ctx.fillText('[DEBUG] Delta Time: ' + dt + 'ms', 20, 20);
    }
};
//# sourceMappingURL=stars.js.map
