package mockups;

import robogp.robodrome.training.Program;
import robogp.robodrome.training.Training;

/**
 *
 * @author Stefano
 */
public class FakeTrainigProgram {
    private Training trainig;
    private Program  program; 
   public FakeTrainigProgram  (){         
        trainig = Training.getInstance("checkmate");
        trainig.setVisible(true);
        program = Program.getInstance("Move1", null, 1);
        program.addInstruction("Move1");
       
        
        trainig.start(); 
               
   }
   public static void main (String[] arg){
       
        FakeTrainigProgram faketrainigprogram = new FakeTrainigProgram ();


       
       
   }
}
