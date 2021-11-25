

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author frank
 */
public class Liste {

    private Knoten start;
    private Knoten last;
    int size = 0;

    public Knoten getStart() {
        return start;
    }

    public void setStart(Knoten start) {
        this.start = start;
    }

    public String toString() {
        String dummy = "";
        if (this.start == null) {
            dummy = dummy + "Die Liste ist noch leer.";
        } else {
            Knoten aktuell = this.getStart();
            while (aktuell != null) {
                dummy = dummy + aktuell.toString();
                aktuell = aktuell.getNf();
            }
        }
        return dummy;
    }
    
    public String toStringrekursiv(){
        if(start == null){
            return "no start point found";
        }else{
            return toStringrekursiv(start);
        }
    }
    
    public String toStringrekursiv(Knoten a){
        if(a.getNf() != null){
            return a.toString() + toStringrekursiv(a.getNf());
        }else{
            return a.toString();
        }
    }

    public Knoten getVg(Knoten a) {
        Knoten nf = null;
        if (a != this.getStart()) {
            Knoten aktuell = this.start;
            boolean gefunden = false;
            while (aktuell.getNf() != null && !gefunden) {
                if (aktuell.getNf() == a) {
                    nf = aktuell;
                    gefunden = true;
                } else {
                    aktuell = aktuell.getNf();
                }
            }
        }
        return nf;
    }

    public void bubblesort(){
    Knoten left = null;
    Knoten right = null;
       for(int i = 0; i < this.getAnzahl(); i++){
           for(int j = 1; j < this.getAnzahl(); j++){
              
               left = this.getKnoten(i);
               right = this.getKnoten(j);
               tausche(left, right);
           }
       }
       
        
    }
    
    public Knoten getEnd(){
        Knoten aktuell = null;
        while(start.getNf() != null){
            if(start == null){
            aktuell = start;
            
        }else{
                return null;
            }
    }
        return aktuell;
    }
    
    
    /*public void delete(){
        
        
    }*/
    public void quicksort(Liste list){
        Knoten pivot = list.start;
        
        Liste lesser = new Liste();
        Liste bigger = new Liste();
        Knoten tmp = pivot.getNf();
        while(tmp!=null){
            if(((Schueler) tmp.getDaten()).getNote() < ((Schueler) pivot.getDaten()).getNote()){
                Knoten biggerElement = tmp;
                tmp = tmp.getNf();
                bigger.append(biggerElement);
                }else{
                Knoten leserElement = tmp;
                tmp = tmp.getNf();
                lesser.append(leserElement);
            }
          }
        
        quicksort(bigger);
        quicksort(lesser);
        
        lesser.append(pivot);
        lesser.appent(bigger);
        
        list.start = lesser.start;
         
    }
    
    public void append(Knoten el){
        if(el==null)return;
        if(last!= null) last.setNf(el);
        size ++;
        last = el;
        if(last!=null) last.setNf(null);
        if(start==null) start = last;
    }
    
    public void appent(Liste l){
        if(last == null){
            last = l.start;
            start = null;
        }else{
            last.setNf(l.start);
        }
        size = size + l.size;
        if(l.last!=null) last = l.last;
    }
        

    

    public void add(Knoten neu) {
        Knoten tmp = null;
        if (this.start != null) {
            tmp = this.start;
        }
        this.start = neu;
        if (tmp != null) {
            this.start.setNf(tmp);
        }
        ////Alternative Variante  EinfÃ¼gen am Ende
//        if(start==null){
//           this.start=neu;
//       } else{
//           Knoten aktuell=this.getStart();
//           while(aktuell.getNf()!=null){
//               aktuell=aktuell.getNf();
//           }
//           aktuell.setNf(neu);
//       }
        ////Alternative Variante  EinfÃ¼gen am Ende
    }

    public int getAnzahl() {
        int anz = 0;
        if (start != null) {
            Knoten aktuell = start;
            while (aktuell != null) {
                anz++;
                aktuell = aktuell.getNf();
            }
        }
        return anz;
    }

    public Knoten getKnoten(int n_a) {
        Knoten aktuell=this.getStart();
        for (int i=0;i<n_a;i++){
            aktuell=aktuell.getNf();
        }
        return aktuell;
    }

    void tausche(Knoten a, Knoten b) {
        if(!(a==b)){
            //0.
            if(a==b.getNf()){
                tausche(b,a);
            }else{
                //1.
                Knoten merke=b.getNf();
                //2.
                Knoten merke2=getVg(b);
                //3.
                if(a==this.getStart()){
                    this.setStart(b);
                }else{
                //3.'
                    getVg(a).setNf(b);
                }
                //4.
                if(b==a.getNf()){
                    b.setNf(a);
                }
                else{
                //4.'
                    b.setNf(a.getNf());
                }
                //5.
                if(b==a.getNf()){
                    a.setNf(merke);
                }else{
                    merke2.setNf(a);
                    a.setNf(merke);
                }
            }
        }
    }
}
        
