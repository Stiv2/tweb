package robogp.train;


import java.awt.BorderLayout;
import java.awt.Dimension;
import java.awt.FlowLayout;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.util.ArrayList;
import java.util.Observable;
import java.util.Observer;
import javax.swing.DefaultListModel;
import javax.swing.JButton;
import javax.swing.JLabel;
import javax.swing.JList;
import javax.swing.JScrollPane;
import javax.swing.JTextField;
import javax.swing.SwingConstants;
import robogp.robodrome.Robodrome;
import robogp.robodrome.view.RobodromeView;

/**
 *
 * @author Stefano
 */
public class TrainigView extends javax.swing.JFrame implements ActionListener, ModelInterfaceView, Observer {
    
   
   private final ProgramController programController;
   private Program program;
   private int element;
   private int swpelemt;
   private boolean flag=false;
    
   
    private final DefaultListModel _model = new javax.swing.DefaultListModel();
    private final JList  _output = new javax.swing.JList();
    private final JScrollPane _scrollPane = new javax.swing.JScrollPane();
     
    private final JButton startButton;
    private final JButton rmvButton;
    private final JButton SwapButton;
    private final JButton placeRobot;
    
    private final JButton move1;
    private final JButton move2;
    private final JButton move3;
    private final JButton uturn;
    private final JButton turnRight;
    private final JButton turnLeft;
    private final JButton back_up;
    
    private final JTextField posx= new javax.swing.JTextField();
    private final JTextField posy= new javax.swing.JTextField();
    private final JLabel posxLabel =new javax.swing.JLabel();
     private final JLabel posyLabel =new javax.swing.JLabel();
    /**
     * Creates new form TrainigView
     */
    public TrainigView() {
        super();
        setLayout(new BorderLayout());
        String rbdFileName = "robodromes/" + "riskyexchange" + ".txt";
        Robodrome robodrome = new Robodrome(rbdFileName);
        RobodromeView toShow= new RobodromeView(robodrome,50);
        this.programController=TrainingController.startTrainig(toShow,robodrome);
        this.program=programController.getProgramInstance();
        this.program.addObserver(this);
        
        //generale
        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setBounds(0, 0, 1000, 710);
    
        //schermata di gioco
        this.getContentPane().add(toShow, BorderLayout.CENTER);
        
        //laterale sopra
        javax.swing.JPanel panel =new javax.swing.JPanel();
        panel.setLayout(new BorderLayout());
        panel.add(_scrollPane,BorderLayout.CENTER);
        _scrollPane.setBounds(0, 0, 500, 500);
         panel.add(_output,BorderLayout.CENTER);
        _output.setBounds(0, 0, 500, 500);
        _output.setModel(_model);
        _scrollPane.getViewport().setView(_output);
        
        _output.addMouseListener(new MouseAdapter() { 
             // metodo che srive nei campi la mail cliccata
             public void mouseClicked(MouseEvent e) {
                 element =e.getY()/17;                       
                    }
         });
        //laterale sotto
        javax.swing.JPanel panel2 =new javax.swing.JPanel();
        panel2.setLayout(new GridLayout(4,1));
        startButton = new JButton("Start");
        startButton.addActionListener(this);
        rmvButton=new JButton("Remove");
        SwapButton=new JButton("Swap");
        rmvButton.addActionListener(this);
        SwapButton.addActionListener(this);     
        panel.setPreferredSize(new Dimension(150,100));
        panel2.add(rmvButton);
        panel2.add(SwapButton);
        panel2.add(startButton);
        
        panel.add(panel2,BorderLayout.SOUTH);
        this.getContentPane().add(panel, BorderLayout.EAST);
        
        //panello sotto
        javax.swing.JPanel panel3 =new javax.swing.JPanel();
        panel3.setLayout(new GridLayout(2,7));
        move1=new JButton("Move1");
        move1.addActionListener(this);
        panel3.add(move1);
        move2=new JButton("Move2");
        move2.addActionListener(this);
        panel3.add(move2);
        move3=new JButton("Move3");   
        move3.addActionListener(this);
        panel3.add(move3);
        uturn=new JButton("U-turn");
        uturn.addActionListener(this);
        panel3.add(uturn);
        turnRight=new JButton("TurnRight");
        turnRight.addActionListener(this);
        panel3.add(turnRight);
        turnLeft=new JButton("TurnLeft");
        turnLeft.addActionListener(this);
        panel3.add(turnLeft);
        back_up=new JButton("Back-up");
        back_up.addActionListener(this);
        panel3.add(back_up);
        posxLabel.setText("RIGA:");
        posxLabel.setHorizontalAlignment(SwingConstants.RIGHT);
        panel3.add(posxLabel);
         panel3.add(posx);
         posyLabel.setText("COLONNA:");
         posyLabel.setHorizontalAlignment(SwingConstants.RIGHT);
         panel3.add(posyLabel);
         panel3.add(posy);
         placeRobot=new JButton("Posiziona");
         placeRobot.addActionListener(this);
         panel3.add(placeRobot);
         this.getContentPane().add(panel3, BorderLayout.SOUTH);
        
        this.setVisible(true);
         
    }

    @Override
    public void actionPerformed(ActionEvent e) {
      Object source = e.getSource();
        if (source == placeRobot){
            int riga = Integer.parseInt(posy.getText());
            int colonna=Integer.parseInt(posx.getText());
            TrainingController.placeRobot(colonna, riga);
        }
        if (source == startButton) {            
                 TrainingController.StartProgram();
        }
        if (source == rmvButton) {            
                programController.removeInstruction(element);
        }       
        if (source == SwapButton) {
           if(flag==false){
             swpelemt=element;
             flag=true;
           }else{
              programController.swapInstruction(swpelemt, element);
              flag=false;
           }
        }
         if (source == move1) {
                programController.addInstruction("Move1");
        }
        if (source == move2) {
                programController.addInstruction("Move2");
        }
        if (source == move3) {
                programController.addInstruction("Move3");
        }
        if (source == uturn) {
                programController.addInstruction("U-turn");
        }
        if (source == back_up) {
                programController.addInstruction("Back-up");
        }
        if (source == turnRight) {
                programController.addInstruction("TurnRight");
        }
        if (source == turnLeft) {
                programController.addInstruction("TurnLeft");
        }
        
      }

   @Override
  public void updateView(Program box){
    ArrayList <String> val = box.getInstruction();
     _model.clear(); 
                  
         for (int i=0;i<val.size();i++){
            _model.addElement(val.get(i));
         }
    }
  
 public static void main (String arg[]){
        TrainigView trainingView =new TrainigView();  
    }

     
  @Override
   public void update(Observable o, Object arg) {
         updateView(( Program)o);
    }
}
interface ModelInterfaceView {
    void updateView(Program box);
}
    
    
    
    

