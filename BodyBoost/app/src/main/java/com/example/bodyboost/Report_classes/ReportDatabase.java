package com.example.bodyboost.Report_classes;

import android.content.Context;

import androidx.annotation.NonNull;
<<<<<<< Updated upstream
=======
import androidx.room.AutoMigration;
>>>>>>> Stashed changes
import androidx.room.Database;
import androidx.room.Room;
import androidx.room.RoomDatabase;
import androidx.sqlite.db.SupportSQLiteDatabase;

<<<<<<< Updated upstream
@Database(entities = Report.class, version = 1)
public abstract class ReportDatabase extends RoomDatabase {

=======
@Database(entities = {Report.class}, version = 3)
public abstract class ReportDatabase extends RoomDatabase {

    // Database class after the version update.


>>>>>>> Stashed changes
    public abstract ReportDao getReportDao();

    private static ReportDatabase INSTANCE;

    public static ReportDatabase getInstance(Context context) {
        if (INSTANCE == null) {
            INSTANCE = Room.databaseBuilder(context.getApplicationContext(),
                            ReportDatabase.class, "reportDB").allowMainThreadQueries()
                    .addCallback(new Callback() {
                        @Override
                        public void onCreate(@NonNull SupportSQLiteDatabase db) {
                            super.onCreate(db);
<<<<<<< Updated upstream
                            db.execSQL("INSERT INTO Report VALUES (1, 53)");
                            db.execSQL("INSERT INTO Report VALUES (2, 63)");
                            db.execSQL("INSERT INTO Report VALUES (3, 73)");
                            db.execSQL("INSERT INTO Report VALUES (4, 70)");
                            db.execSQL("INSERT INTO Report VALUES (5, 67)");
                        }
                    })
=======
                            db.execSQL("INSERT INTO report VALUES (1, 53)");
                            db.execSQL("INSERT INTO report VALUES (2, 63)");
                            db.execSQL("INSERT INTO report VALUES (3, 73)");
                            db.execSQL("INSERT INTO report VALUES (4, 70)");
                            db.execSQL("INSERT INTO report VALUES (5, 67)");
                        }
                    })
                    .fallbackToDestructiveMigration()
>>>>>>> Stashed changes
                    .build();
        }
        return INSTANCE;
    }

}
