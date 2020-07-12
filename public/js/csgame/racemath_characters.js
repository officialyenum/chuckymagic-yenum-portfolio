Quintus.RacemathCharacters = function(Q) {
	Q.Sprite.extend("Rival", {
    init: function(p) {
      this._super(p, {
        type: Q.SPRITE_RACER,
        collisionMask: Q.SPRITE_OTHER
      });
      this.add('2d');
      this.p.vx = 40 + Math.random()*40;              
    },
  });

  Q.Sprite.extend("Player", {
    init: function(p) {
        this._super(p, { 
          sheet: 'player',
          type: Q.SPRITE_RACER,
          collisionMask: Q.SPRITE_OTHER
        });
        this.add('2d');        
      }
  });

  Q.Sprite.extend("Princess", {
      init: function(p) {
        this._super(p, { 
          sheet: 'girl',
          type: Q.SPRITE_OTHER,
          collisionMask: Q.SPRITE_OTHER
        });
        this.add('2d');
        
        this.on("hit",function(collision) {
          if(collision.obj.isA("Player")) {
            Q.stageScene("endGame",1, { label: "You Won!" }); 
            this.destroy();
          }
          else if(collision.obj.isA("Rival")) {
            Q.stageScene("endGame",1, { label: "Game Over!" }); 
            this.destroy();
          }
        });
      }
  });
};