package mockups;

import robogp.robodrome.training.Training;

/**
 *
 * @author Stefano
 */
public class FakeTrainigProgram {
    private Training trainig;
   public FakeTrainigProgram  (){          
               
                trainig = Training.getInstance("checkmate");
               
   }
   public void main (String[] arg){
       
        FakeTrainigProgram faketrainigprogram = new FakeTrainigProgram ();

       
       
   }
}
