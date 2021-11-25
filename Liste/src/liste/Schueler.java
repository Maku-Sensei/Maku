/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Ein neuer Kommentar
//ein noch tollerererer Kommentar
//
/**
 *
 * @author frank
 */
public class Schueler {
//Attribute

    private String Name, Vorname;
    private int Note;
    private String Gebdat;

    public String getName() {
        return this.Name;
    }

    public void setName(String name) {
        this.Name = name;
    }

    public String getVorname() {
        return this.Vorname;
    }

    public void setVorname(String vorname) {
        this.Vorname = vorname;
    }

    public int getNote() {
        return this.Note;
    }

    public void setNote(int note) {
        this.Note = note;
    }

    public String getGebdat() {
        return this.Gebdat;
    }

    public void setGebdat(String gebdat) {
        this.Gebdat = gebdat;
    }
    
    
//Methoden
//Constructor

    public Schueler() {
        this.Name = "Kaste";
        this.Vorname = "Hans";
        this.Note = 13;
        this.Gebdat = "01.01.2000";
    }

    public Schueler(String name, String vorname, int note, String gebdat) {
        this.Name = name;
        this.Vorname = vorname;
        this.Note = note;
        this.Gebdat = gebdat;
    }

    public Schueler(int note, String name, String vorname, String gebdat) {
        this.Name = name;
        this.Vorname = vorname;
        this.Note = note;
        this.Gebdat = gebdat;
    }

    public String toString() {
        String dummy ="Geb.Dat: " + this.Gebdat + " ";
        dummy = dummy + this.Vorname + " "+ this.Name + " ";
        dummy = dummy + "Note: " + String.valueOf(this.Note) + "\n";
        return dummy;
    }

}
