package com.example.ckankonmange.suspendons;

import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;

import org.json.JSONObject;

import java.io.InputStream;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;

public class ProfileActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        SharedPreferences prefs = getSharedPreferences(MainActivity.prefsFile, MODE_PRIVATE);
        String mEmail = prefs.getString("email", null);//"No name defined" is the default value.
        String mPassword = prefs.getString("password", null); //0 is the default value.
        if (mEmail == null && mPassword == null)
        {
            return;
        }
        else
        {
            //Verification

            String err = null;
            try
            {
                String name = prefs.getString("name", "No name defined");
                String email = prefs.getString("email", "No email defined");
                String address = prefs.getString("address", "No address defined");
                String dateCreation = prefs.getString("dateCreation", "No creation date defined");
                String region = prefs.getString("region", "No region defined");

                TextView tempText = (TextView) findViewById(R.id.textInfoMail);
                tempText.setText(email);
                tempText = (TextView) findViewById(R.id.textInfoPseudo);
                tempText.setText(name);
                tempText = (TextView) findViewById(R.id.textInfoAddress);
                tempText.setText(address);
                tempText = (TextView) findViewById(R.id.textInfoRegion);
                tempText.setText(region);
                tempText = (TextView) findViewById(R.id.textInfoDateCreation);
                tempText.setText(dateCreation);


            }
            catch (Exception e)
            {
                e.printStackTrace();
            }
        }
    }
}
