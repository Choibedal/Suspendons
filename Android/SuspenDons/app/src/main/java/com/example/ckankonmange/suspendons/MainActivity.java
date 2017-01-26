package com.example.ckankonmange.suspendons;

import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageButton;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity
{
    public enum returnCode {
        LoginActivity(220), ProfileActivity(221), MapsActivity(222), DonationActivity(223), AdActivity(224);

        private final int value;
        private returnCode(int value)
        {
            this.value = value;
        }
        public int getValue() {
            return value;
        }
    }
    public static final String prefsFile = "userLoginInformations";

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }

    public void goToLoginActivity(View v)
    {
        startActivityForResult(new Intent(MainActivity.this, LoginActivity.class), returnCode.LoginActivity.getValue());
    }

    public void goToProfileActivity(View v)
    {
        startActivityForResult(new Intent(MainActivity.this, ProfileActivity.class), returnCode.ProfileActivity.getValue());
    }

    public void goToMapActivity(View v)
    {
        startActivityForResult(new Intent(MainActivity.this, MapsActivity.class), returnCode.MapsActivity.getValue());
    }

    public void goToDonationActivity(View v)
    {
        startActivityForResult(new Intent(MainActivity.this, DonationActivity.class), returnCode.DonationActivity.getValue());
    }

    public void goToAdActivity(View v)
    {
        startActivityForResult(new Intent(MainActivity.this, AdActivity.class), returnCode.AdActivity.getValue());
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data)
    {
        if (requestCode == returnCode.LoginActivity.getValue())
        {
            ImageButton loginButton = (ImageButton) findViewById(R.id.login_icon);
            loginButton.setImageResource(R.drawable.user);
            loginButton.setOnClickListener(new View.OnClickListener()
            {
                @Override
                public void onClick(View view)
                {
                    goToProfileActivity(view);
                }
            });

            TextView loginText = (TextView) findViewById(R.id.login_text);
            loginText.setText("Profil");
        }
    }
}
