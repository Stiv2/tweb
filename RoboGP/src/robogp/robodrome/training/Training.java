package robogp.robodrome.training;


import java.awt.BorderLayout;
import robogp.matchmanager.RobotMarker;
import robogp.robodrome.Direction;
import robogp.robodrome.Robodrome;
import robogp.robodrome.view.RobodromeView;



/**
 *
 * @author Stefano
 */
public class Training extends javax.swing.JFrame{
    private static Training singleInstance;
    private final Robodrome robodrome;
    private Program program;
    private final RobodromeView toShow;
    private RobotMarker robot; 
    public enum State {
         Started, Paused, Interrupted
    };
    
    private State status;
    
    private Training (String rbdName){
        String rbdFileName = "robodromes/" + rbdName + ".txt";
        this.robodrome = new Robodrome(rbdFileName);
         initComponents();
        toShow = new RobodromeView(new Robodrome(rbdFileName ), 55, 1); 
        program=Program.getInstance("U-turn",toShow,1);                         //NOOOOOOOOO
        robot = new RobotMarker("robot-blue", "blue");                          //NOOOOOOOOOOOOOOOOO
        this.getContentPane().add(toShow, BorderLayout.CENTER);                 //NOOOOOOOOOOOOOOOOO
        
    }
    
    public static Training getInstance(String rbdName) {
        if (Training.singleInstance == null) {
            Training.singleInstance = new Training(rbdName);
        }
        return Training.singleInstance;
    }
    
     public void start() {
        this.status = State.Started;
        program.run(); 
        robot.free();                                                           //NOOOOOOOOOOOOOOOOO
        toShow.addRobot( robot,  Direction.E, 5, 5, true); 
        
     } 
       private void initComponents() {

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        setBounds(0, 0, 910, 710);
    }// </editor-fold>                        

       
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Training.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Training.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Training.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Training.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
             
              Training trainig =  new Training("checkmate");
               trainig.setVisible(true);
               trainig.start(); 
               
            }
        });
    }
 
}
