package robogp.train;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;




/**
 *
 * @author Stefano
 */



public class Instructions {
  private final String  FILENAME ="instruction/InstructionsList.txt";
  private ArrayList <Istruction> instructions =new ArrayList ();
  private static Instructions singleInstance;
    
    
   private Instructions (){
     try {
            BufferedReader reader;
            reader = new BufferedReader(new FileReader(FILENAME));
            String line;
            while ((line = reader.readLine()) != null) {        
            String[] pr=line.split(";");
            Istruction newInstructio=new Istruction(pr[0],Integer.parseInt(pr[1])
                    ,Integer.parseInt(pr[2]),Integer.parseInt(pr[3]),Integer.parseInt(pr[4]),Integer.parseInt(pr[5]));
            instructions.add(newInstructio);     
            }
     } catch (IOException ex) {ex.printStackTrace();}
     
   }
   
   public ArrayList <Istruction> getInstruction(){
       return this.instructions; 
   }
   
   public static Instructions getInstance() {
        if (Instructions.singleInstance == null) {
            Instructions.singleInstance = new Instructions();
        }
        return  Instructions.singleInstance;
    }
}

