package robogp.train;

/**
 *
 * @author Stefano
 */
enum States {
         Started, Paused, Interrupted;
    };

public class State{
    private States state;
    private static State singleInstance;

    
public static State getInstance() {
        if (State.singleInstance == null) {
            State.singleInstance = new State();
        }
        return  State.singleInstance;
    }


    private State (){
        this.state=States.Paused; 
    }
    
    
    public void setStarted(){
         this.state=States.Started; 
    }
    
    public void setPaused(){
         this.state=States.Paused; 
    }
    
    public void setInterrupted(){
         this.state=States.Interrupted; 
    }
    
    public String getState(){
        String stat=""; 
        
      switch (state){
          case Started:
              stat="started";
              break;
              
          case Interrupted:
              stat="interrupted";
              break;
          
          case Paused:
              stat="paused";
              break;
              
      }
     return stat; 
    }   
}