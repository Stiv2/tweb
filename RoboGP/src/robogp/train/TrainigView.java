package robogp.train;

import java.awt.BorderLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.JButton;
import robogp.robodrome.Robodrome;
import robogp.robodrome.view.RobodromeView;

/**
 *
 * @author Stefano
 */
public class TrainigView extends javax.swing.JFrame implements ActionListener {
    
   private static Training train;
   
    private final JButton startButton;
    /**
     * Creates new form TrainigView
     */
    public TrainigView() {
        super();
        setLayout(new BorderLayout());
        String rbdFileName = "robodromes/" + "riskyexchange" + ".txt";
        
        Robodrome robodrome = new Robodrome(rbdFileName);
        RobodromeView toShow= new RobodromeView(robodrome,50);
        
        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setBounds(0, 0, 910, 710);
        
        train=TrainingController.startTrainig(toShow,robodrome);
        this.getContentPane().add(toShow, BorderLayout.CENTER);
        
        
        startButton = new JButton("Start");
        startButton.addActionListener(this);
        this.getContentPane().add(startButton, BorderLayout.EAST);
        
        this.setVisible(true);
         
    }
    
    



    @Override
    public void actionPerformed(ActionEvent e) {
        Object source = e.getSource();
        
        if (source == startButton) {
            TrainingController.StartProgram();
        }
      }
 public static void main (String arg[]){
        TrainigView trainingView =new TrainigView();
    }
}
    
    
    
    

