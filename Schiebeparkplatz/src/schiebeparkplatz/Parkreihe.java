/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package schiebeparkplatz;

/**
 *
 * @author Werbu
 */
public class Parkreihe {
    private Auto auto;
    private Parkreihe reihe;

    public Parkreihe(Auto auto) {
        this.auto = auto;
    }

    public Auto getAuto() {
        return auto;
    }

    public void setAuto(Auto auto) {
        this.auto = auto;
    }

    public Parkreihe getReihe() {
        return reihe;
    }

    public void setReihe(Parkreihe reihe) {
        this.reihe = reihe;
    }
    
}
