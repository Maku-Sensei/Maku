/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package schiebeparkplatz;

/**
 *
 * @author Werbu
 */
public class Auto {
    private char bezeichnung;
    private int position;
    

    public Auto(char bezeichnung, int position) {
        this.bezeichnung = bezeichnung;
        this.position = position;
    }

    public char getBezeichnung() {
        return bezeichnung;
    }

    public void setBezeichnung(char bezeichnung) {
        this.bezeichnung = bezeichnung;
    }

    public int getPosition() {
        return position;
    }

    public void setPosition(int position) {
        this.position = position;
    }

    
    
    
    
}
