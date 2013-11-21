import java.lang.Math;
import java.util.Vector;
import java.util.Scanner;
import java.io.*;

public class Distance {
	Vector<Vector<Float>> data;
	int dim;
	
	public Distance(String index) {
		Scanner scanner = null;
		try {
			data = new Vector<Vector<Float>>();		
			scanner = new Scanner(new FileReader(new File(index)));
			//first use a Scanner to get each line
			while ( scanner.hasNextLine() ){
	    	processLine( scanner.nextLine() );
      }
			scanner.close();
			dim = data.firstElement().size();
			processDistance();
    } catch (Exception e) {
    	System.out.println("error");
			e.printStackTrace();
    }
		
	}
	
	void processDistance() {
		for (int i=0;i<data.size();i++) {
			for (int j=0;j<data.size();j++) {
				float d = 0f;
				for (int k=0; k<dim; k++) {
					d += (data.get(i).get(k) - data.get(j).get(k)) * (data.get(i).get(k)
					- data.get(j).get(k));
				}
				System.out.print(Math.sqrt(d) + " ");
			}
			System.out.println("");
		}
	}
	
	void processLine(String aLine){
    //use a second Scanner to parse the content of each line 
		Vector<Float> v = new Vector<Float>();
    Scanner scanner = new Scanner(aLine);
    scanner.useDelimiter(" ");
    while ( scanner.hasNext() ){
      String value = scanner.next();
			v.add(new Float(value));
    }
		data.add(v);
	}

	
	public static void main(String[] args) {
        	Distance d = new Distance(args[0]);
    	
	}
	
}
