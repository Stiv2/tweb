package robogp.train;


import robogp.robodrome.Rotation;

/**
 *
 * @author Stefano
 */
public class Istruction {
   private String name;
   private int number; 
   private int priorityMin;   
   private int priorityMax;
   private int movement;
   private Rotation rotation; 
   
   
   
   public Istruction (String name,int number,int priorityMin,int priorityMax,int movement,int rotation){
       this.name=name; 
       this.number=number; 
       this.priorityMin=priorityMin;
       this.priorityMax=priorityMax;
       this.movement=movement;  
       switch (rotation){
           case 90:
               if(priorityMax==420)
                  this.rotation=Rotation.CW90;
               else 
                  this.rotation=Rotation.CCW90; 
               break;
           case 180:
               this.rotation=Rotation.CW180;
                break;
           case 0:
               this.rotation=Rotation.NO;
                break;
       }
   }
   
   public String getName(){
       return this.name; 
   }
   
   public int getNumber(){
       return this.number; 
   }
   
   public int getPriorityMin(){
       return this.priorityMin; 
   }
   
   public int getPriorityMax(){
       return this.priorityMax; 
   }
   
   public Rotation getRotation(){
       return this.rotation; 
   }
   
   public int getMovement(){
       return this.movement; 
   }
}
