/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author frank
 * @param <Type>
 */
public class Knoten<Type> {

    private Type daten;
    private Knoten nf;
    

    public Knoten(Type neueDaten) {
        this.daten = neueDaten;
    }

    public Type getDaten() {
        return (Type)daten;
    }

    public void setDaten(Type daten) {
        this.daten = daten;
    }

    public Knoten getNf() {
        return nf;
    }

    public void setNf(Knoten nf) {
        this.nf = nf;
    }

    @Override
    public String toString() {
        String dummy = this.daten.toString() + "\n";
        return dummy;
    }
    
}
