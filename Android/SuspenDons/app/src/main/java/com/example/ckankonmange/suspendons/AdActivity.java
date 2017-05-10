package com.example.ckankonmange.suspendons;

import android.graphics.PixelFormat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.MediaController;
import android.widget.TextView;
import android.widget.VideoView;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.res.Configuration;
import android.media.MediaPlayer;
import android.media.MediaPlayer.OnPreparedListener;
import android.net.Uri;
import android.os.Bundle;
import android.util.Log;
import android.widget.MediaController;
import android.widget.VideoView;

import java.io.IOException;

public class AdActivity extends AppCompatActivity
{
    private String path;
    private VideoView myVideoView;
    private TextView textViewPartnerName, textViewPartnerLink;
    private int position = 0;
    private ProgressDialog progressDialog;
    private MediaController mediaControls;
    private PartnerService partnerService = new PartnerService();
    private PartnerAdModel partnerAdModel = null;

    @Override
    protected void onCreate(final Bundle savedInstanceState) {

        //Setup
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ad);

        textViewPartnerName = (TextView) findViewById(R.id.PartnerName);
        textViewPartnerLink = (TextView) findViewById(R.id.PartnerLink);

        //set the media controller buttons
        if (mediaControls == null) {
            mediaControls = new MediaController(AdActivity.this);
        }

        //initialize the VideoView
        myVideoView = (VideoView) findViewById(R.id.PartnerAd);

        // create a progress bar while the video file is loading
        progressDialog = new ProgressDialog(AdActivity.this);
        // set a title for the progress bar
        progressDialog.setTitle("Chargement de la vidéo");
        // set a message for the progress bar
        progressDialog.setMessage("Veuillez patienter...");
        //set the progress bar not cancelable on users' touch
        progressDialog.setCancelable(false);
        // show the progress bar
        progressDialog.show();




        PartnerAdModel tempPartnerAdModel = new PartnerAdModel();
        tempPartnerAdModel.partnerLink = "http://www.google.fr";
        tempPartnerAdModel.partnerName = "Google";
        tempPartnerAdModel.videoLink = "http://www.androidbegin.com/tutorial/AndroidCommercial.3gp";
        //Only this work: http://www.androidbegin.com/tutorial/AndroidCommercial.3gp
        //From http://www.androidbegin.com/tutorial/android-video-streaming-videoview-tutorial/
        //Ok cool c'est random https://stackoverflow.com/questions/7806261/strange-behavior-of-android-videoview-cant-play-video
        //J'ai déjà dit que Android c'était de la merde?

        partnerAdModel = tempPartnerAdModel;
        /*/Get video URL
        //TODO: Create API on server
        //TODO: Should work, make the rest wait

            //Do this on another thread
            new Thread(new Runnable()
            {
                public void run()
                {
                    try
                    {
                        partnerAdModel = partnerService.getRandomPartnerAd();
                    } catch (Exception e)
                    {
                        Log.e("Error", e.getMessage());
                        e.printStackTrace();
                        return;
                    }
                }
            }).start();*/





        //Set all data
        path = partnerAdModel.videoLink;
        textViewPartnerName.setText(partnerAdModel.partnerName);
        textViewPartnerLink.setText(partnerAdModel.partnerLink);
        //set the uri of the video to be played
        myVideoView.setVideoURI(Uri.parse(path));
        myVideoView.start();
        //Show video
        myVideoView.requestFocus();
        //we also set an setOnPreparedListener in order to know when the video file is ready for playback
        myVideoView.setOnPreparedListener(new OnPreparedListener() {

            public void onPrepared(MediaPlayer mediaPlayer) {

                mediaPlayer.start();
                //set the media controller in the VideoView
                myVideoView.setMediaController(mediaControls);
                // close the progress bar and play the video
                progressDialog.dismiss();
                //if we have a position on savedInstanceState, the video playback should start from here
                myVideoView.seekTo(position);
                if (position == 0) {
                    myVideoView.start();
                } else {
                    //if we come from a resumed activity, video playback will be paused
                    myVideoView.pause();
                }
            }
        });


    myVideoView.setOnErrorListener(new MediaPlayer.OnErrorListener() {
        @Override
        public boolean onError(MediaPlayer mp, int what, int extra) {
            progressDialog.dismiss();
            return false;
        }
    });








    }

    @Override
    public void onSaveInstanceState(Bundle savedInstanceState) {
        super.onSaveInstanceState(savedInstanceState);
        //we use onSaveInstanceState in order to store the video playback position for orientation change
        savedInstanceState.putInt("Position", myVideoView.getCurrentPosition());
        myVideoView.pause();
    }

    @Override
    public void onRestoreInstanceState(Bundle savedInstanceState) {
        super.onRestoreInstanceState(savedInstanceState);
        //we use onRestoreInstanceState in order to play the video playback from the stored position
        position = savedInstanceState.getInt("Position");
        myVideoView.seekTo(position);
    }
}
