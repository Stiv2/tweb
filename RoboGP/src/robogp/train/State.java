package robogp.train;

/**
 *
 * @author Stefano
 */
public enum State {
         Started, Paused, Interrupted;
         
      private  State state; 
         
      public void  setState (State state){
          this.state=state;
      }
      public State getState (){
          return this.state; 
      }
    };
